import java.util.Scanner;

public class Main {

	public static void main(String[] args) {
		// TODO Auto-generated method stub
		Scanner sc = new Scanner(System.in);
		int num = sc.nextInt();
		for(int i = 0;i < num;i++) {
			int n = sc.nextInt();
			int nPrime = 1;
			for(int a = 2;;a++) {
				if(isPrime(a)) {
					nPrime++;
				}
				if(nPrime == n) {
					System.out.print(a + " ");
					nPrime = 1;
					break;
				}
				
			}
		}
	}
	static boolean isPrime(int n) {
		if(n % 2 == 0) {return false;}
		for(int i = 3;i <= n/2;i+=2) {
			if(n % i == 0) {
				return false;
			}
		}
		return true;
	}

}
