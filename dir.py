import os

def list_directories(base_dir, output_file):
    with open(output_file, 'w+') as file:
        for root, dirs, _ in os.walk(base_dir):
            for directory in dirs:
                file.write(os.path.join(root, directory) + '\n')

# Example usage
base_dir = './'  # Replace with your directory path
output_file = 'directories_list.txt'       # Output file name
list_directories(base_dir, output_file)

print(f"Directory and subdirectory list written to {output_file}")
