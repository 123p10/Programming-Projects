import java.util.Scanner;

public class Main {

	public static void main(String[] args) {
		// TODO Auto-generated method stub
		//System.out.println("Hello");
		Scanner sc = new Scanner(System.in);
		int num = sc.nextInt();
		int a[] = new int[num+1];
		int b[] = new int[num+1];
		a[0] = 0;
		b[0] = 0;
		int count = 0;
		//int tallya = 0;
		for(int l = 0; l < 2;l++) {
			for(int i = 1;i <= num;i++) {
				if(l == 0) {a[i] = sc.nextInt() + a[i-1];}
				else {b[i] = sc.nextInt() + b[i-1];}
			}
		}
		for(int i = num;i >= 1;i--) {
			if(a[i] == b[i]) {
				System.out.println(i);
				break;
			}
			if(a[i] != b[i] && i == 1) {
				System.out.println(0);
			}
		}
	}

}
