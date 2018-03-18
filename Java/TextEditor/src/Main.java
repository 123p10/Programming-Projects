import java.awt.BorderLayout;
import java.awt.Container;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.io.BufferedReader;
import java.io.BufferedWriter;
import java.io.File;
import java.io.FileNotFoundException;
import java.io.FileReader;
import java.io.FileWriter;
import java.io.IOException;

import javax.swing.JFileChooser;
import javax.swing.JFrame;
import javax.swing.JMenu;
import javax.swing.JMenuBar;
import javax.swing.JMenuItem;
import javax.swing.JPanel;
import javax.swing.JScrollPane;
import javax.swing.JTextArea;
import javax.swing.ScrollPaneConstants;
import javax.swing.UIManager;
import javax.swing.UnsupportedLookAndFeelException;

public class Main{
	public static JTextArea textField;
	public static JFrame frame;
	final static JFileChooser fc = new JFileChooser();
	static File currFile;
	
	public static void main(String[] args) {
		javax.swing.SwingUtilities.invokeLater(new Runnable() {
			public void run() {
				init();
			}});

	}
	
	public static void init() {
		/*try {
			UIManager.setLookAndFeel(UIManager.getSystemLookAndFeelClassName());
		} catch (ClassNotFoundException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		} catch (InstantiationException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		} catch (IllegalAccessException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		} catch (UnsupportedLookAndFeelException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}*/

		currFile = new File(System.getProperty("user.home")+"/Untitled.txt");
		frame = new JFrame(currFile.getPath() + " - Text Editor");
		frame.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
		frame.setJMenuBar(setupMenu());
		frame.setContentPane(setupText());
		frame.pack();
		//Delete this later
		frame.setBounds(100, 100, 1200, 600);
		frame.setResizable(true);
		frame.setVisible(true);
	}
	
	public static Container setupText() {
		JPanel contentPane = new JPanel(new BorderLayout());

		textField = new JTextArea();
		textField.setText("");
		JScrollPane scroll = new JScrollPane(textField);
	    scroll.setVerticalScrollBarPolicy(ScrollPaneConstants.VERTICAL_SCROLLBAR_ALWAYS);
		contentPane.add(scroll);
		return contentPane;
	}
	
	public static JMenuBar setupMenu() {
		JMenuBar menuBar;
		JMenu file,openS;
		JMenuItem newI,openTxtI,saveI,saveAsI,deleteI;
		menuBar = new JMenuBar();
		//File Menu
		file = new JMenu("File");
		menuBar.add(file);
		newI = new JMenuItem("New");
		newI.addActionListener(new ActionListener() {
		    @Override
		    public void actionPerformed(ActionEvent e)
		    {
		     	newFile();
		    }
		});
		file.add(newI);
		openS = new JMenu("Open");
		file.add(openS);
		
		openTxtI = new JMenuItem("Text");
		openTxtI.addActionListener(new ActionListener() {
		    @Override
		    public void actionPerformed(ActionEvent e)
		    {
		    	openText();
		    }

			
		});
		openS.add(openTxtI);
		saveI = new JMenuItem("Save");
		saveI.addActionListener(new ActionListener() {
		    @Override
		    public void actionPerformed(ActionEvent e)
		    {
		    	saveText();
		    }
		});
		file.add(saveI);
		saveAsI = new JMenuItem("Save As");
		saveAsI.addActionListener(new ActionListener() {
		    @Override
		    public void actionPerformed(ActionEvent e)
		    {
		    	saveAsText();
		    }
		});
		file.add(saveAsI);
		
		deleteI = new JMenuItem("Delete");
		deleteI.addActionListener(new ActionListener() {
		    @Override
		    public void actionPerformed(ActionEvent e)
		    {
		    	delete();
		    }
		});
		file.add(deleteI);
		return menuBar;
	}
	
	public static void newFile() {
	    try {
			currFile = File.createTempFile("tempfile", ".tmp");
		} catch (IOException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
	    textField.setText("");
	    setTitle();
	}
	
	public static void openText() {
		String fileName = "";
		File selectedFile = new File(fileName);
		fc.setCurrentDirectory(new File(System.getProperty("user.home")));
		int result = fc.showOpenDialog(frame);
		if(result == JFileChooser.APPROVE_OPTION){
			selectedFile = fc.getSelectedFile();
			fileName = fc.getSelectedFile().getPath();
		}
        String line = null;
        textField.setText("");
        try {
            FileReader fileReader = new FileReader(fileName);
            BufferedReader bufferedReader = new BufferedReader(fileReader);
            while((line = bufferedReader.readLine()) != null) {
            	textField.append(line + "\n");
            }   
            bufferedReader.close();         
        }
        catch(FileNotFoundException ex) {
            System.out.println("Unable to open file '" + fileName + "'");                
        }
        catch(IOException ex) {
            System.out.println("Error reading file '" + fileName + "'");                  
        }
        currFile = selectedFile;
        setTitle();
	}
	
	public static void saveText() {
			try {
				BufferedWriter writer = new BufferedWriter(new FileWriter(currFile.getPath()));
				writer.write(textField.getText());
				writer.close();

			} catch (IOException e) {
				// TODO Auto-generated catch block
				e.printStackTrace();
			}
			setTitle();
	}
	
	public static void saveAsText() {
		String fileName = "";
		File selectedFile = new File(fileName);
		int result = fc.showSaveDialog(frame);
		if(result == JFileChooser.APPROVE_OPTION){
			selectedFile = fc.getSelectedFile();
			fileName = fc.getSelectedFile().getPath();
		}
	
		try {
			BufferedWriter writer = new BufferedWriter(new FileWriter(fileName));
			writer.write(textField.getText());
			writer.close();
	
		} catch (IOException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		currFile = selectedFile;
		setTitle();

	}
	public static void delete() {
        if(currFile.delete())
        {
            System.out.println("File deleted successfully");
            newFile();
        }
        else
        {
            System.out.println("Failed to delete the file");
            newFile();
        }

	}
	public static void setTitle() {
		
		frame.setTitle(currFile.getPath() + " - Text Editor");
	}
}
