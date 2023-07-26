const fs = require('fs');
const path = require('path');
const readline = require('readline');

// Function to count words, characters, and lines in a file
function countFile(file) {
    return new Promise((resolve, reject) => {
        let words = 0;
        let characters = 0;
        let lines = 0;

        const rl = readline.createInterface({
            input: fs.createReadStream(file),
            crlfDelay: Infinity
        });

        rl.on('line', line => {
            lines++;
            words += line.trim().split(/\s+/).length;
            characters += line.length;
        });

        rl.on('close', () => {
            resolve({ words, characters, lines });
        });

        rl.on('error', err => {
            reject(err);
        });
    });
}

// Function to recursively count words, characters, and lines in a directory
function countDirectory(directory) {
    return new Promise((resolve, reject) => {
        fs.readdir(directory, (err, files) => {
            if (err) {
                reject(err);
                return;
            }

            let totalWords = 0;
            let totalCharacters = 0;
            let totalLines = 0;

            const filePromises = files.map(file => {
                const filePath = path.join(directory, file);

                return new Promise((resolveFile, rejectFile) => {
                    fs.stat(filePath, (err, stats) => {
                        if (err) {
                            rejectFile(err);
                            return;
                        }

                        if (stats.isDirectory()) {
                            countDirectory(filePath)
                                .then(({ words, characters, lines }) => {
                                    totalWords += words;
                                    totalCharacters += characters;
                                    totalLines += lines;
                                    resolveFile();
                                })
                                .catch(rejectFile);
                        } else {
                            countFile(filePath)
                                .then(({ words, characters, lines }) => {
                                    totalWords += words;
                                    totalCharacters += characters;
                                    totalLines += lines;
                                    resolveFile();
                                })
                                .catch(rejectFile);
                        }
                    });
                });
            });

            Promise.all(filePromises)
                .then(() => {
                    resolve({ words: totalWords, characters: totalCharacters, lines: totalLines });
                })
                .catch(reject);
        });
    });
}

// Specify the workspace directory
const workspaceDirectory = '../HTML/';

// Count words, characters, and lines in the workspace
countDirectory(workspaceDirectory)
    .then(({ words, characters, lines }) => {
        console.log('Total words:', words);
        console.log('Total characters:', characters);
        console.log('Total lines:', lines);
    })
    .catch(error => {
        console.error('Error counting workspace:', error);
    });
