import java.util.Scanner;

public class Main {

	public static void main(String[] args) {
		// TODO Auto-generated method stub
		int ix = 0;
		int iy = 0;
		int angle = 0;
		//0 Pointing N
		//45 pointing NE
		//90 pointing E
		Scanner sc = new Scanner(System.in);
		//Take in two inputs for initial input
		ix = sc.nextInt();
		iy = sc.nextInt();
		String temp = "";
		int tempVar = 0;
		while(true) {
			temp = sc.next();
			if(temp.compareTo("TURN") == 0) {
				tempVar = sc.nextInt();
				angle += tempVar;
			}
			else if(temp.compareTo("MOVE") == 0) {
				tempVar = sc.nextInt();
				if(angle % 360 == 0) {iy -= tempVar;}
				if(angle % 360 == 90) {ix += tempVar;}
				if(angle % 360 == 180) {iy += tempVar;}
				if(angle % 360 == 270) {ix -= tempVar;}
				if(angle % 360 == -90) {ix -= tempVar;}
				if(angle % 360 == -180) {iy += tempVar;}
				if(angle % 360 == -270) {ix += tempVar;}
			}
			else if(temp.compareTo("STOP") == 0) {
				break;
			}
			
			
			
		}
		System.out.println(ix + " " + iy);
	}

}
