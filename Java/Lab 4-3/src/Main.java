import java.util.Scanner;

public class Main {
	public static void main(String[] args) {
		Scanner s = new Scanner(System.in);
		System.out.println("Input Bandbooster 1's Name");
		BandBooster b1 = new BandBooster(s.next());
		System.out.println("Input Bandbooster 2's Name");
		BandBooster b2 = new BandBooster(s.next());
		for(int i = 0;i < 3;i++) {
			System.out.println("Enter the number of boxes sold by " + b1.getName() + " this week: ");
			b1.updateSales(s.nextInt());
		}
		System.out.println(b1);
		for(int i = 0;i < 3;i++) {
			System.out.println("Enter the number of boxes sold by " + b2.getName() + " this week: ");
			b2.updateSales(s.nextInt());
		}
		System.out.println(b2);
	}
	
	
}
