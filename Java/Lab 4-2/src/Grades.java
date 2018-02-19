public class Grades

{

public static void main(String[] args)

{
	
	Student student1 = new Student("Mary");
	Student student2 = new Student("Mike");
	student1.inputGrades();
	System.out.println(student1 + " Average: " +student1.getAverage());;
	
	System.out.println();
	
	
	student2.inputGrades();
	System.out.println(student2 + " Average: " + student2.getAverage());;

	}

}

