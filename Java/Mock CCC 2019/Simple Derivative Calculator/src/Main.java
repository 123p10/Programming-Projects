import java.util.ArrayList;
import java.util.Scanner;

public class Main {
	public static void main(String[] args) {
		// TODO Auto-generated method stub
		//2x^2+2x+2
		Scanner sc = new Scanner(System.in);
		int num = sc.nextInt();
		for(int i = 0;i < num;i++) {
			String poly = sc.next();
			ArrayList<Integer> exponents = new ArrayList();
			ArrayList<Integer> coefficients = new ArrayList();
			String tempCo = "";
			for(int a = 0;a < poly.length();a++) {
				if(a == poly.length()-1) {
					tempCo += poly.charAt(a);
					if(tempCo == "") {tempCo = "1";}
					coefficients.add(Integer.parseInt(tempCo));
					tempCo = "";
					exponents.add(0);
					continue;
				}
				if(poly.charAt(a) == '+') {
					if(tempCo == "") {tempCo = "1";}
					coefficients.add(Integer.parseInt(tempCo));
					tempCo = "";
					exponents.add(0);
					continue;

				}

				if(poly.charAt(a) == 'x') {
					if(poly.charAt(a+1) == '^') {
						if(tempCo == "") {tempCo = "1";}

						coefficients.add(Integer.parseInt(tempCo));
						tempCo = "";
						exponents.add(poly.charAt(a+2) - '0');
						a+=3;
						continue;
					}
					else {
						if(tempCo == "") {tempCo = "1";}

						coefficients.add(Integer.parseInt(tempCo));
						tempCo = "";
						exponents.add(1);
						a++;
						continue;
					}
				}
				else {
					tempCo += poly.charAt(a);
				}
			}
			boolean firstPlus = false;
			for(int b = 0;b < coefficients.size();b++) {
				if(coefficients.get(b) * exponents.get(b) != 0) {
					if(firstPlus == true) {
						System.out.print("+");
					}
					else {
						firstPlus = true;
					}
					System.out.print(coefficients.get(b) * exponents.get(b));
					if((exponents.get(b)-1) != 1 && (exponents.get(b)-1) != 0) {
						System.out.print("x^" + (exponents.get(b)-1));
					}
					if((exponents.get(b)-1) == 1) {
						System.out.print("x");
					}
				}
			}
			System.out.print(" ");
			
		}
		
	}

}
