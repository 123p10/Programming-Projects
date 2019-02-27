import java.util.*;
class Main {
  public static void main(String[] args) {
    Scanner sc = new Scanner(System.in);
    int count = sc.nextInt();
    for(int i = 0;i < count;i++){
      int temp = sc.nextInt();
      int sum = 0;
      for(int a = 1;a <= temp;a++) {
    	  sum += a;
      }
      System.out.println(sum/temp + " ");
    }
  }
}