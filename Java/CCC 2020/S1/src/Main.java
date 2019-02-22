import java.util.Scanner;

public class Main {

	public static void main(String[] args) {
		// TODO Auto-generated method stub
	//	System.out.println("aaa");
		Scanner sc = new Scanner(System.in);
		String s = sc.next();
		int in[][] = {{1,2},{3,4}};
		//y,x
		int tempA,tempB;
		for(int i = 0;i < s.length();i++) {
		//	System.out.println(in[i][0]);
			if(s.charAt(i) == 'H') {
				tempA = in[0][0];
				tempB = in[0][1];
				in[0][0] = in[1][0];
				in[0][1] = in[1][1];
				in[1][0] = tempA;
				in[1][1] = tempB;
			}
			else {
				tempA = in[0][0];
				tempB = in[1][0];
				in[0][0] = in[0][1];
				in[1][0] = in[1][1];
				in[0][1] = tempA;
				in[1][1] = tempB;
			}
		}
		System.out.println(in[0][0] + " " + in[0][1]);
		System.out.println(in[1][0] + " " + in[1][1]);

	}

}
