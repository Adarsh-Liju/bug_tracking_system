import os
import sys
import time

def cyclomatic_complexity(filename):
    """Use cyclopy"""
    os.system("cyclopy -f " + filename + " > cyclo.txt")
    with open("cyclo.txt", "r") as cyclo_file:
        for line in cyclo_file:
            if filename in line:
                return line.split()[-1]

if __name__ == '__main__':
    file=input("Enter the file name: ")
    print("Cyclomatic Complexity of the file is: ",cyclomatic_complexity(file))