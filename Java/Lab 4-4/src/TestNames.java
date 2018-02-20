import java.util.Scanner;

public class TestNames {
	
	public static void main(String args[]) {
		Scanner s = new Scanner(System.in);
		System.out.println("Input the First Name(First Middle Last)");
		Name first = new Name(s.next(),s.next(),s.next());
		System.out.println(first.firstMiddleLast());
		System.out.println(first.lastFirstMiddle());
		System.out.println(first.initials());
		System.out.println(first.length());
		System.out.println();
		System.out.println("Input the Second Name(First Middle Last)");
		Name second = new Name(s.next(),s.next(),s.next());
		System.out.println(second.firstMiddleLast());
		System.out.println(second.lastFirstMiddle());
		System.out.println(second.initials());
		System.out.println(second.length());
		System.out.println();
		if(first.equals(second.firstMiddleLast())) {
			System.out.println("The names are the same");
		}
		else {
			System.out.println("The names are not the same");

		}
	}
}
