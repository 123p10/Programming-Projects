def main():
    maxJerseys = int(input("Input the number of Jerseys"))
    maxAthletes = int(input("Input the number of Athletes"))
    jerseys = ['S':0,'M':0,'L':0]
    for i in range(0,maxJerseys):
        char = input()
        jerseys[char]++
    for i in range(0,maxAthletes):
        jerseys.append(input())

main()
