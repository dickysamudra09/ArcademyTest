num = ""

i = int(input("Input Number : "))
x = i
while x >= 0:
	y = x
	while y > 0:
		num = num + " "
		y = y - 1
	
	right = 1
	while right < (i - (x-1)):
		num = num + "*"
		right = right + 1		
		
	num = num + "\n"
	x = x - 1
	
print(num)