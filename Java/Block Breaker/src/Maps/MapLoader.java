package Maps;

import java.io.BufferedReader;
import java.io.FileNotFoundException;
import java.io.FileReader;
import java.io.IOException;
import java.util.ArrayList;

import Main.Game;
import Objects.Block;

public class MapLoader {
	
	public MapLoader() {
		
	}
	public void readLevel(String str) {
		ArrayList<String> level = new ArrayList();
		String line = null;
	       try {
	            FileReader fileReader = new FileReader(str);
	            BufferedReader bufferedReader = new BufferedReader(fileReader);

	            while((line = bufferedReader.readLine()) != null) {
	            	level.add(line);
	            }   

	            // Always close files.
	            bufferedReader.close();         
	        }
	       catch(FileNotFoundException ex){
	    	   System.out.println("File Not Found");
	       }
	        catch(IOException ex) {
	            System.out.println(
	                "Error reading file '" 
	                + str + "'");                  
	        }
	       
	       
	   for(int i = 0;i < level.size();i++) {
		   for(int j = 0;j < level.get(i).length();j++) {
			   if(level.get(i).charAt(j) == '0') {
				   	
			   }
			   else if(level.get(i).charAt(j) == '1') {
				   Game.blocks.add(new Block(j * 25 + 40,i * 25,20,20,1));
			   }
			   else if(level.get(i).charAt(j) == '2') {
				   Game.blocks.add(new Block(j * 25 + 40,i * 25,20,20,2));
			   }
			   else if(level.get(i).charAt(j) == '3') {
				   Game.blocks.add(new Block(j * 25 + 40,i * 25,20,20,3));
			   }
			   else if(level.get(i).charAt(j) == '4') {
				   Game.blocks.add(new Block(j * 25 + 40,i * 25,20,20,4));
			   }

		   }
	   }
	       
	       


	}
}
