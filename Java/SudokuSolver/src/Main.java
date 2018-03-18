import java.util.Arrays;

public class Main {
	//[y][x]
	static int[][] array = new int[9][9];
	public static void main(String[] args) {
		// TODO Auto-generated method stub
		loadPuzzle(2);
	//	System.out.println(Arrays.deepToString(array));
		//checkCell(5,5);
		printArray();
		while(true) {
			for(int r = 0;r < 9;r++) {
				for(int c = 0;c < 9;c++) {
					if(array[r][c] == 0) {
						checkCell(r,c);
					}
				}
			}

			int count = 0;
			for(int r = 0;r < 9;r++) {
				for(int c = 0;c < 9;c++) {
					if(array[r][c] == 0) {
						count++;
					}
				}
			}
			if(count == 0) {
				break;
			}
			
		}
		printArray();
	}
	public static void loadPuzzle(int level) {
		//0 works
		//1 does not work
		//2 does not work
		if(level == 0) {
			//TOP LEFT BLOCK
			array[0][1] = 6;
			array[1][0] = 5;
			array[1][1] = 3;
			array[1][2] = 7;
			array[2][1] = 4;
			//TOP MIDDLE BLOCK
			array[0][3] = 3;
			array[1][4] = 9;
			array[2][5] = 6;
			//TOP RIGHT BLOCK
			array[0][6] = 8;
			array[0][8] = 4;
			array[2][6] = 3;
			array[2][8] = 7;
			//MIDDLE LEFT BLOCK
			array[3][1] = 9;
			array[5][0] =7;
			array[5][1] = 1;
			array[5][2] = 3;
			//MIDDLE MIDDLE BLOCK
			array[3][4] = 5;
			array[3][5] = 1;
			array[5][3] = 6;
			array[5][4] = 2;
			//MIDDLE RIGHT BLOCK
			array[3][6] = 2;
			array[3][7] = 3;
			array[3][8] = 8;
			array[5][7] = 4;
			//BOTTOM LEFT BLOCK
			array[6][0] = 3;
			array[8][0] = 1;
			array[6][2] = 6;
			array[8][2] = 2;
			//BOTTOM MIDDLE BLOCK
			array[6][3] = 4;
			array[7][4] = 6;
			array[8][5] = 9;
			//BOTTOM RIGHT BLOCK
			array[6][7] = 1;
			array[7][6] = 5;
			array[7][7] = 2;
			array[7][8] = 3;
			array[8][7] = 8;
		}
		if(level == 1) {
			//K THIS IS IMPOSSIBLE
			//TOP LEFT
			array[1][1] = 9;
			array[2][2] = 6;
			//TOP MIDDLE
			array[2][4] = 2;
			array[1][4] = 1;
			//TOP RIGHT
			array[1][7] = 3;
			array[2][6] = 7;
			//MIDDLE LEFT
			array[4][0] = 2;
			array[4][1] = 1;
			//MIDDLE MIDDLE
			array[3][3] = 3;
			array[3][5] = 4;
			//MIDDLE RIGHT
			array[4][7] = 9;
			array[4][8] = 8;
			//BOTTOM LEFT
			array[7][1] = 8;
			array[6][2] = 2;
			//BOTTOM MIDDLE
			array[6][3] = 5;
			array[6][5] = 6;
			//BOTTOM RIGHT
			array[6][6] = 4;
			array[7][7] = 1;
		}
		if(level == 2) {
			//TOP LEFT
			array[0][1] = 7;
			array[0][2] = 1;
			array[2][0] = 4;
			array[2][1] = 9;
			//TOP MIDDLE
			array[0][4] = 9;
			array[1][3] = 3;
			array[1][5] = 6;
			//TOP RIGHT
			array[0][6] = 8;
			array[2][6] = 7;
			array[2][8] = 5;
			///MIDDLE LEFT
			array[3][1] = 1;
			array[4][0] = 9;
			array[4][2] = 2;
			//MIDDLE MIDDLE
			array[3][3] = 9;
			array[5][5] = 8;
			//MIDDLE RIGHT
			array[4][6] = 6;
			array[4][8] = 3;
			array[5][7] = 2;
			//BOTTOM LEFT
			array[6][0] = 8;
			array[6][2] = 5;
			array[8][2] = 7;
			//BOTTOM MIDDLE
			array[7][3] = 6;
			array[7][5] = 7;
			array[8][4] = 4;
			//BOTTOM RIGHT
			array[6][7] = 7;
			array[6][8] = 6;
			array[8][6] = 3;
			array[8][7] = 5;
		}
		
	}
	public static void printArray() {
		for(int r = 0;r < 9;r++) {
			for(int c = 0;c < 9;c++) {
				if(c % 3 == 0 && c != 0) {
					System.out.print("|");
				}
				if(array[r][c] != 0) {
					System.out.print(array[r][c]);
				}
				else {
					System.out.print("0");
				}
			}
			System.out.println();
			if((r+1) % 3 == 0 && r != 0) {
				System.out.println("-----------");
			}
		}
	}
	public static void checkCell(int r,int c) {
		boolean[] impossible = new boolean[10];
		for(int i = 1;i <= 9;i++) {
			for(int a = 0;a < 9;a++) {
				if(a != c) {
					if(i == array[r][a]) {
						impossible[i] = true;
					}
				}
			}
			for(int b = 0;b < 9;b++) {
				if(b != r) {
					if(i == array[b][c]) {
						impossible[i] = true;
					}
				}
			}
			//TOP ROW BOXES
			if(r >= 0 && r <= 2) {
				if(c >= 0 && c <= 2) {
					for(int a = 0;a <= 2;a++) {
						for(int b = 0;b <= 2;b++) {
							if(array[a][b] == i) {
								impossible[i] = true;
							}
						}
					}
				}
				else if(c >= 3 && c <= 5) {
					for(int a = 0;a <= 2;a++) {
						for(int b = 3;b <= 5;b++) {
							if(array[a][b] == i) {
								impossible[i] = true;
							}
						}
					}
				}
				else if(c >= 6 && c <= 8) {
					for(int a = 0;a <= 2;a++) {
						for(int b = 6;b <= 8;b++) {
							if(array[a][b] == i) {
								impossible[i] = true;
							}
						}
					}

				}
			}
			//MIDDLE ROW BOXES
			if(r >= 3 && r <= 5) {
				if(c >= 0 && c <= 2) {
					for(int a = 3;a <= 5;a++) {
						for(int b = 0;b <= 2;b++) {
							if(array[a][b] == i) {
								impossible[i] = true;
							}
						}
					}

				}
				else if(c >= 3 && c <= 5) {
					for(int a = 3;a <= 5;a++) {
						for(int b = 3;b <= 5;b++) {
							if(array[a][b] == i) {
								impossible[i] = true;
							}
						}
					}
				}
				else if(c >= 6 && c <= 8) {
					for(int a = 3;a <= 5;a++) {
						for(int b = 6;b <= 8;b++) {
							if(array[a][b] == i) {
								impossible[i] = true;
							}
						}
					}

				}
			}
			//BOTTOM ROW BOXES
			if(r >= 6 && r <= 8) {
				if(c >= 0 && c <= 2) {
					for(int a = 6;a <= 8;a++) {
						for(int b = 0;b <= 2;b++) {
							if(array[a][b] == i) {
								impossible[i] = true;
							}
						}
					}

				}
				else if(c >= 3 && c <= 5) {
					for(int a = 6;a <= 8;a++) {
						for(int b = 3;b <= 5;b++) {
							if(array[a][b] == i) {
								impossible[i] = true;
							}
						}
					}
				}
				else if(c >= 6 && c <= 8) {
					for(int a = 6;a <= 8;a++) {
						for(int b = 6;b <= 8;b++) {
							if(array[a][b] == i) {
								impossible[i] = true;
							}
						}
					}
				}
			}
		}
		int num = 0;
		int curr = 0;
		for(int i = 1;i <= 9;i++) {
			if(impossible[i] == false) {
				num++;
				curr = i;
			}
		}
		if(num == 1) {
			array[r][c] = curr;
		}
	//	System.out.println(r + " "  + c);
		//System.out.println(Arrays.toString(impossible));		
	}
}
