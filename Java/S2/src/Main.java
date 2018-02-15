import java.util.ArrayList;
import java.util.Collections;
import java.util.Scanner;

public class Main {
	public static int in[][];
	public static int out[][];

	public static int n;
	public static int rankI[][];
	public static int rankA[][];

	public static void main(String[] args) {

		Scanner s = new Scanner(System.in);
		n = s.nextInt();
		in = new int[n][n]; 
		out = new int[n][n]; 

		rankI = new int[n][n];
		ArrayList<Integer> list = new ArrayList();
		ArrayList<Integer> listO = new ArrayList();

		for(int i = 0;i < n;i++) {
			for(int a = 0;a < n;a++) {
				in[a][i] = s.nextInt();
			}
		}
		for(int y = 0;y < n;y++) {
			for(int x = 0;x < n;x++) {
				list.add(in[x][y]);
			}
		}
		Collections.sort(list);
		for(int y = 0;y < n;y++) {
			for(int x =0; x<n;x++) {
				for(int i = 0;i < list.size();i++) {
					if(in[x][y] == list.get(i)) {
						listO.add(in[x][y]);		
					}
				}
			}
		}
		for(int y = 0;y < n;y++) {
			for(int x = 0;x<n;x++) {
				
			}
		}
		//isRotated(in,n);
		
	
	}
			
}


