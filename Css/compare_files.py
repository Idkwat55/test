import difflib
with open('123.css') as file1:
	_123css = file1.readlines()
with open('02- css.css') as file2:
	_02_css = file2.readlines()

for line in difflib.unified_diff(_123css,_02_css,fromfile = '123.css',tofile = '_02_css.css',lineterm = ''):
	print(line)
