import java.util.Scanner;


public class Student{
String name;
int score1, score2;
Scanner s = new Scanner(System.in);

public Student(String studentName)
{
	name = studentName;
}


public void inputGrades()
{
	System.out.println("Enter "  + name + "'s score for Test 1");
	score1 = s.nextInt();
	System.out.println("Enter "  + name + "'s score for Test 2");
	score2 = s.nextInt();
}


public int getAverage()
{
	return (score1 + score2)/2;
	

}


public String getName(){
	return name;
}

public String toString() {
	return "Name: " + name + " Test1: " + score1 + " Test2: " + score2;
	
}

}