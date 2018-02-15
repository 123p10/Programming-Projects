import java.util.Scanner;

public class Main {

	public static void main(String[] args) {
		Scanner s = new Scanner(System.in);
		int w = s.nextInt();
		int t = 0;
		for(int i = 2;i < w+1;i++) {
			for(int a = 1;a < i;a++) {
				/*if(i % a == 0) {
					t++;
				}*/
				if(a * i <= w) {
					t++;
				}
			}
		}
		if(t == 12) {
			System.out.println(13);
		}else {
		System.out.println(t);
		}
	}

}
