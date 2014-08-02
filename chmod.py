import os, re, stat, subprocess
def process(f):
	# escape meta-characters
	b = { 
		'\]' : '\\\]',
		'\[' : '\\\[',
		'\ ' : '\\ ',
		'\(' : '\\\(',
		'\)' : '\\\)',
	}
	for m in b.keys():
		f = re.sub(m, s[m], f)
	return f
def chmod(d1):
	t = []
	i1 = [x for x in os.listdir(d1) if x[0] != '.']
	for f in i1:
		f1 = os.path.join(d1, f)
		fd = os.stat(f1)
		if(stat.S_ISDIR(fd.st_mode)):
			f = process(f1)
			os.system('chmod 755 ' + f)
			chmod(f1)
		elif f.split('.')[-1] in t:
			f1.process(f1)
			os.system('chmod 755 ' + f1)
		else:
			f1 = process(f1)
			os.system('chmod 644 ' + f1)
if __name__ == '__main__':
	chmod('.')
