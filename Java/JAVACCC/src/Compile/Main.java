package Compile;


import java.util.Scanner;

public class Main {
	public static void main() {
		Scanner s = new Scanner(System.in);
		String input = s.nextLine();
		int total = 0;
		for(int i = 0;i < input.length();i+=2) {
			int num = input.charAt(i) - '0';
			char div = input.charAt(i+1);
			int d = 0;
			if(div == 'I') {
				d = 1;
			}
			if(div == 'V') {
				d = 5;
			}
			if(div == 'X') {
				d = 10;
			}
			if(div == 'L') {
				d = 50;
			}
			if(div == 'C') {
				d = 100;
			}
			if(div == 'D') {
				d = 500;
			}
			if(div == 'M') {
				d = 1000;
			}
			char a = 'a';
			if(i + 3 < input.length()) {
				 a = input.charAt(i+3);
			}
			int o = 0;
			if(a == 'I') {
				o = 1;
			}
			if(a == 'V') {
				o = 5;
			}
			if(a == 'X') {
				o = 10;
			}
			if(a == 'L') {
				o = 50;
			}
			if(a == 'C') {
				o = 100;
			}
			if(a == 'D') {
				o = 500;
			}
			if(a == 'M') {
				o = 1000;
			}
			if(o > d) {
				total -= d * num;
			}
			else {
				total += d * num;
			}
		}
	}
}
