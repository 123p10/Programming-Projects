import java.util.Scanner;

public class Main {

	public static void main(String[] args) {
		// TODO Auto-generated method stub
		//System.out.println("aa");
		Scanner sc = new Scanner(System.in);
		long square[][]  = new long[3][3];
		int ex[][] = new int[3][3];
		int xSeq[] = new int[3];
		int ySeq[] = new int[3];
		//int output[][] = new int[3][3]
		for(int y = 0;y < 3;y++) {
			for(int x = 0;x < 3;x++) {
				if(sc.hasNextInt()) {
					square[y][x] = sc.nextInt();
				}
				else {
					ex[y][x] = 1;
					sc.next();
				}
			}
		}
		/*if(square[0][0] == 14 && square[1][2] == 18 && square[2][1] == 16 && ex[0][1] == 1) {
			square[0][0] = 14;
			square[1][0] = 14;
			square[2][0] = 14;

			square[0][1] = 16;
			square[0][2] = 18;
			square[1][1] = 16;
			square[1][2] = 18;
			square[2][1] = 16;
			square[2][2] = 18;

		}*/
		
		while(isFinished(square) == 0) {
			for(int y = 0;y < 3;y++) {
				if(ex[y][0] == 0 && ex[y][1] == 0 && ex[y][2] == 0) {continue;}
				if(ex[y][0] == 1) {
					if(ex[y][1] == 1) {
						//XX
						
						if(ex[y][2] == 1) {
							//XXX
							continue;
						}
					}
					else if(ex[y][2] == 1) {
						//Two Xs
						//XAX
						ySeq[y] = 0;
						//ySeq[y] = (int) (Math.random() * 6 - 3);
						square[y][0] = square[y][1] - ySeq[y];
						square[y][2] = square[y][1] + ySeq[y];

					}
					else {
						//XAB
						ySeq[y] = (int)(square[y][2] - square[y][1]);
						square[y][0] = square[y][1] - ySeq[y];
					}
				}
				else {
					if(ex[y][1] == 1) {
						//AXX
						if(ex[y][2] == 1) {
							//AXX
							ySeq[y] = 0* (int) (Math.random() * 20 - 10);
							square[y][1] = square[y][0] + ySeq[y];
							square[y][2] = square[y][0] + 2*ySeq[y];

						}
						else {
							//AXB
							ex[y][1] = 0;
							ySeq[y] = (int)(square[y][2] - square[y][0])/2;
							square[y][1] = ySeq[y] + square[y][0]; 
	
						}
					}
					else if(ex[y][2] == 1) {
						//ABX
						ySeq[y] = (int)(square[y][1] - square[y][0]);
						square[y][2] = 2 * ySeq[y] + square[y][0]; 
						ex[y][2] = 0;

					}
				}
			}
			for(int y = 0;y < 3;y++) {
				if(ex[0][y] == 0 && ex[1][y] == 0 && ex[2][y] == 0) {continue;}
				if(ex[0][y] == 1) {
					if(ex[1][y] == 1) {
						//XX
						if(ex[2][y] == 1) {
							//XXX
							continue;
						}
					}
					else if(ex[2][y] == 1) {
						//Two Xs
						//XAX
						xSeq[y] = 0*(int) (Math.random() * 6 - 3);
						square[0][y] = square[1][y] - xSeq[y];
						square[2][y] = square[1][y] + xSeq[y];
					}
					else {
						//XAB
						xSeq[y] = (int)(square[2][y] - square[1][y]);
						square[0][y] = square[1][y] - xSeq[y];
						ex[0][y] = 0;

					}
				}
				else {
					if(ex[1][y] == 1) {
						//AXX
						if(ex[2][y] == 1) {
							//AXX
							xSeq[y] = 0*(int) (Math.random() * 6 - 3);
							square[1][y] = square[0][y] + xSeq[y];
							square[2][y] = square[0][y] + 2*xSeq[y];
						}
						else {
							//AXB
							xSeq[y] = (int)(square[2][y] - square[0][y])/2;
							square[1][y] = xSeq[y] + square[0][y]; 
							ex[1][y] = 0;

						}
					}
					else if(ex[2][y] == 1) {
						//ABX
						xSeq[y] = (int)(square[1][y] - square[0][y]);
						square[2][y] = 2 * xSeq[y] + square[0][y]; 
						ex[2][y] = 0;

					}
				}
			}
			/*for(int y = 0;y < 3;y++) {
				for(int x = 0;x < 3;x++) {
					System.out.print(square[y][x] + " ");
				}
				System.out.println();
			}*/

		}
		for(int y = 0;y < 3;y++) {
			for(int x = 0;x < 3;x++) {
				System.out.print(square[y][x] + " ");
			}
			System.out.println();
		}
		//System.out.print(isFinished(square));
		
	}
	static int isFinished(long square[][]) {
		int finished = 1;
		for(int y = 0;y < 3;y++) {
			if(square[y][2] - square[y][1] != square[y][1] - square[y][0]) {
				return 0;
			}
		}
		for(int x = 0;x < 3;x++) {
			if(square[2][x] - square[1][x] != square[1][x] - square[0][x]) {
				return 0;
			}
		}

		return 1;
	}

}
