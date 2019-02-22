import java.util.Scanner;

public class Main {

	public static void main(String[] args) {
		// TODO Auto-generated method stub
		//System.out.println("hlelo");
		Scanner sc = new Scanner(System.in);
		int asteriks = 0;
		char needed1[] = new char[27];
		char needed2[] = new char[27];
		String first = sc.next();
		String second = sc.next();
		for(int i = 0;i < first.length();i++) {
			needed1[first.charAt(i) - 'a']++;
		}
		for(int i = 0;i < second.length();i++) {
			if(second.charAt(i) == '*') {
				asteriks++;
			}
			else {
				needed2[second.charAt(i) - 'a']++;
			}
		}
		for(int i = 0;i <= 26;i++) {
			if(needed1[i] - needed2[i] > 0) {
				asteriks -= (needed1[i] - needed2[i]);
			}
			else if(needed1[i] < needed2[i]) {
				asteriks = -1000;
				break;
			}
		}
		if(asteriks == 0) {
			System.out.println("A");
		}
		else {
			System.out.println("N");
		}
		//System.out.println(first);
		//System.out.println('b' - 'a');
	}

}
