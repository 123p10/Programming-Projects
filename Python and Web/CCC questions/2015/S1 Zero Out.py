#IN PROGRESS


def main():
    list = []
    sum = 0
    max = int(input("What is the length\n"))
    for x in range(0,max):
        temp = int(input(""))
        if temp == 0:
            list.pop()
        else:
            list.append(temp)
    for i in range(len(list)):
        sum += list[i]
    print("\nThe output is: " , sum)

main()
