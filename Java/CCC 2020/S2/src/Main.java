import java.util.Scanner;

public class Main {

	public static void main(String[] args) {
		// TODO Auto-generated method stub
	//	System.out.println("S2");
//		System.out.println(isPrime(13));
		Scanner sc = new Scanner(System.in);
		int testcases = sc.nextInt();
		int tests[] = new int[testcases];
		for(int i = 0;i < testcases;i++) {
			tests[i] = sc.nextInt();
	//	}
	//	for(int i = 0;i < testcases;i++) {
		//	tests[i] = sc.nextInt();
			if(tests[i] % 2 == 0) {
				for(int b = 1;b < tests[i];b+=2) {
					
					if(isPrime(tests[i] - b) == 1 && isPrime(tests[i] + b) == 1) {
						System.out.println((tests[i]-b) + " " + (tests[i] + b));
						break;
					}
				}
			}
			else {
				for(int b = 2;b < tests[i];b+=2) {
					if(isPrime(tests[i] - b) == 1 && isPrime(tests[i] + b) == 1) {
						System.out.println((tests[i]-b) + " " + (tests[i] + b));
						break;
					}
				}
			}
		}


	}
	static int isPrime(int n) {
	//	int isP = 1;
		if(n == 2) {return 1;}
		if(n == 1) {return 1;}
		if(n % 2 == 0) {
			return 0;
		}
		for(int i = 3;i <= n/2;i+=2) {
			if(i % 3 == 0 && i != 3) {continue;}
			if(i % 5 == 0 && i != 5) {continue;}

			if(n % i == 0) {
				return 0;
			}
			if(n / i < i) {
				break;
			}
		}
		return 1;
	}

}
