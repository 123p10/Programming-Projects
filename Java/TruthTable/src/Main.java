import java.util.Arrays;

import javax.script.ScriptEngine;
import javax.script.ScriptEngineManager;
import javax.script.ScriptException;

public class Main{
	public static String input = "A * (B + C)";
	ScriptEngineManager mgr;
    ScriptEngine engine;
    String letters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    boolean[] terms = new boolean[26];
    int numberOfTerms = 0;
	public Main() {
		
	}
	public void run() {
		for(int i = 0;i < input.length();i++) {
			if(input.charAt(i) == '*') {
				input = input.substring(0, i) + "&&" + input.substring(i+1,input.length());
			}
			if(input.charAt(i) == '+') {
				input = input.substring(0, i) + "||" + input.substring(i+1,input.length());
			}
			for(int j = 0;j < letters.length();j++) {
				if(letters.charAt(j) == input.charAt(i)) {
					terms[j] = true;
				}
			}
		}
		System.out.println(input);
	    mgr = new ScriptEngineManager();
	    engine = mgr.getEngineByName("JavaScript");
	//    eval(new int[]{1,1,0});
	    for(int i = 0; i < terms.length;i++) {
	    	if(terms[i]) {
	    		numberOfTerms++;
	    		System.out.print(letters.charAt(i));
	    	}
	    }
	    System.out.print(" Q");
	    System.out.println();
	    printB(numberOfTerms);
	}
	void eval(int[] arr) {
		String newInput = input;
		for(int i = 0;i < newInput.length();i++) {
			for(int j = 0;j < letters.length();j++) {
				if(letters.charAt(j) == newInput.charAt(i)) {
					if(arr[j] == 0) {
						newInput = newInput.substring(0, i) + false + newInput.substring(i+1,newInput.length());
					}
					else {
						newInput = newInput.substring(0, i) + true + newInput.substring(i+1,newInput.length());
					}
				//	System.out.println(j);
				}
			}
		}
	//	System.out.println(newInput);
	//	System.out.println(Arrays.toString(arr));
		try {
			if((boolean) engine.eval(newInput)) {
				System.out.println(" "  + 1);
			}
			else {
				System.out.println(" "  + 0);

			}
		} catch (ScriptException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
	}
	void printB(int n)
	{         
	  for(int i = 0; i < Math.pow(2,n); i++)         
	  {    
		int[] ints = new int[n];
	    String format="%0"+n+"d";
	    String str = String.format(format,Integer.valueOf(Integer.toBinaryString(i)));
	    System.out.print(str);
	    char[] ch = str.toCharArray();
	    for(int j = 0;j < ch.length;j++) {
	    	ints[j] = Character.getNumericValue(ch[j]);
	   // 	System.out.println(ints[j]);
	    }
	    eval(ints);
	  }
	}
	
}
