import java.util.ArrayList;
import java.util.Arrays;
import java.util.Scanner;

public class Main {

	public static void main(String[] args) {
		// TODO Auto-generated method stub
	//	System.out.print("S4");
		Scanner sc = new Scanner(System.in);
		int n = sc.nextInt();
		int k = sc.nextInt();
		int days = n/k;
		int score = 0;
		int activities[] = new int[n];
		int sorted[] = new int[n];
		ArrayList<Integer> nHighest = new ArrayList<Integer>();
		if(n % k == 0) {
			days = n/k;
		}
		else {
			days = n/k+1;
		}
		int maxscore = 0;
		for(int i = 0;i < n;i++) {
			activities[i] = sc.nextInt();
			sorted[i] = activities[i];
		}
		Arrays.sort(sorted);
		for(int i = 0;i < days;i++) {
			nHighest.add(sorted[n-1-i]);
		}
		int sum = 0;
		int max = 0;
		int endofday = 0;
		int crossedmax = 0;
		int day = 0;
		for(int i = 0;i < n;i++) {
			if(i - endofday > k) {
				endofday = i;
				sum+=max;
				day++;
				continue;
			}
			if(activities[i] > max) {
				max = activities[i];
			}
			if(nHighest.contains(Integer.valueOf(activities[i]))) {
				endofday = i;
				sum+=max;
				day++;
				continue;

			}
		}
		System.out.println(sum);
	}

}
