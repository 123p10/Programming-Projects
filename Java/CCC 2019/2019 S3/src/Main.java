import java.util.ArrayList;
import java.util.Arrays;
import java.util.Scanner;

public class Main {

	public static void main(String[] args) {
		// TODO Auto-generated method stub
	//	System.out.println("hello");
		Scanner sc = new Scanner(System.in);
		int num = sc.nextInt();
		int freq[] = new int[1001];
		int sorted[] = new int[1001];
		int highest = 0;
		int pos = 0;
		int highest2 = 0;
		ArrayList<Integer> hf = new ArrayList<Integer>();
		ArrayList<Integer> hf2 = new ArrayList<Integer>();

		for(int i = 0;i < num;i++) {
			int temp = sc.nextInt();
			freq[temp]++;
			sorted[temp]++;
		}
		Arrays.sort(sorted);
		highest = sorted[1000];
		for(int i = 1000;i >= 1;i--) {
			if(sorted[i] < highest) {
				highest2 = sorted[i];
				break;
			}
		}
		for(int i = 1;i <= 1000;i++) {
			if(freq[i] == highest) {
				hf.add(i);
			}
			if(freq[i] == highest2) {
				hf2.add(i);
			}
		}
		if(hf.size() > 1) {
			int greatest = 0;
			int lowest = 2000000;
			for(int i = 0;i < hf.size();i++) {
				if(hf.get(i) > greatest) {greatest = hf.get(i);}
				if(hf.get(i) < lowest) {lowest = hf.get(i);}
			}
			System.out.println(greatest-lowest);

		}
		else if(hf.size() == 1 && hf2.size() == 1) {
			if(hf.get(0) > hf2.get(0)) {
				System.out.print(hf.get(0) - hf2.get(0));
			}
			else {
				System.out.print(hf2.get(0) - hf.get(0));
			}
		}
		else if(hf.size() == 1 && hf2.size() >= 1){
			int largestdiff = 0;
			for(int i = 0;i < hf2.size();i++) {
				if(Math.abs(hf.get(0) - hf2.get(i)) > largestdiff) {
					largestdiff = Math.abs(hf.get(0) - hf2.get(i));
				}
			}
			System.out.println(largestdiff);
		}
	}
}
