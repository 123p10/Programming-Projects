import java.util.*;
class Main {
  public static void main(String[] args) {
    Scanner sc = new Scanner(System.in);
    int count = sc.nextInt();
    for(int i = 0;i < count;i++){
      int temp = sc.nextInt();
      System.out.println((temp+1)/2 + " ");
    }
  }
}