import java.util.Scanner;

public class Main {

	public static void main(String[] args) {
		// TODO Auto-generated method stub
	//	System.out.println("a");
		Scanner sc = new Scanner(System.in);
		int n = sc.nextInt();
		int k = sc.nextInt();
		int triangle[][] = new int[n][n+2];
		for(int y = 0;y < n;y++) {
			for(int x = 0; x < y+1;x++) {
				triangle[y][x] = sc.nextInt();
				
				triangle[y][x+1] = -1;
			}
		}
		int sum = 0;
		for(int y = 0;y <= n-k;y++) {
			int b = 0;
			while(triangle[y][b] != -1) {
				int max = 0;
//				int row = y;
				for(int c = y;c < y+k;c++) {
					int i = b;
					while(triangle[c][i] != -1 ) {
						if(triangle[c][i] > max) {
							max = triangle[c][i];
						}
						i++;
					}
				//	System.out.println(max);

				}
				sum += max;
				b++;
			}
		}
		System.out.println(sum);
	}

}
