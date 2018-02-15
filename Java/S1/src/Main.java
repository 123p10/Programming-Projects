import java.util.ArrayList;
import java.util.Arrays;
import java.util.Collections;
import java.util.Scanner;

public class Main {

	public static void main(String[] args) {
		int nV = 0;
		Scanner s = new Scanner(System.in);
		nV = s.nextInt();
		double smallest = Double.MAX_VALUE;
		int village[] = new int[nV];
		for(int i = 0;i < village.length;i++) {
			village[i] = s.nextInt();
		}
		Arrays.sort(village);
		for(int i = 0;i< village.length;i++) {
	//		System.out.println(village[i]);
		}
		for(int i = 0;i < village.length;i++) {
			double l = Integer.MAX_VALUE;
			double r = Integer.MAX_VALUE;

			if(i-1 < 0) {
				 l = Integer.MAX_VALUE;
			}
			else {
				 l = (village[i] - village[i-1])*0.5f;
			}
			if(i+1 < village.length) {
				r = ((village[i+1] - village[i])*0.5f);
			}
			double c = village[i];
			double t = Math.abs(l)+Math.abs(r);
		//	System.out.println("L: " + l + " R: " + r + "T:" + t);
			if(t < smallest && t != 0) {
				smallest = t;
			}
		}
		System.out.println(smallest);
	}

}
