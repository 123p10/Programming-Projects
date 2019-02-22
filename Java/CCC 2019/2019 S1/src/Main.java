import java.util.Scanner;

public class Main {

	public static void main(String[] args) {
		Scanner sc = new Scanner(System.in);
		int num = sc.nextInt();
		int count = 0;
		/*for(int i = num;i >= num/2;i--) {
			count++;
		}*/
		for(int i = 0; i <= 5;i++) {
			if(num - i <= 5 && num - i >= 0 && num-i >= i) {count++;}
		}
		System.out.println(count);
		//System.out.println(num/2+1);
		//System.out.print((num+2)/2);
	}

}
