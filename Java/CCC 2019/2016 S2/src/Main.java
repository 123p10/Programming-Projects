import java.util.Arrays;
import java.util.Scanner;

public class Main {

	public static void main(String[] args) {
		// TODO Auto-generated method stub
		//System.out.println("a");
		Scanner sc = new Scanner(System.in);
		int choice = sc.nextInt();
		int num = sc.nextInt();
		int D[] = new int[num];
		int P[] = new int[num];
		for(int i = 0;i < num;i++) {
			D[i] = sc.nextInt();
		}
		for(int i = 0;i < num;i++) {
			P[i] = sc.nextInt();
		}
		if(choice == 1) {
			int min = 0;
			Arrays.sort(D);
			Arrays.sort(P);
			for(int i = 0; i < num;i++) {
				if(D[i] >= P[i]) {
					min += D[i];
				}
				else {
					min += P[i];
				}
			}
			System.out.println(min);
		}
		else {
			int min = 0;
			Arrays.sort(D);
			Arrays.sort(P);
			for(int i = 0; i < num;i++) {
				if(D[num-1-i] >= P[i]) {
					min += D[num-1-i];
				}
				else {
					min += P[i];
				}
			}
			System.out.println(min);	
		}
	}

}
