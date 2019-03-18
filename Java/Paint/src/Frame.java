import java.awt.BorderLayout;
import java.awt.Color;
import java.awt.Component;
import java.awt.Container;
import java.awt.Dimension;
import java.awt.Graphics;
import java.awt.Image;
import java.awt.Panel;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.awt.event.MouseEvent;
import java.io.BufferedInputStream;
import java.io.File;
import java.io.FileInputStream;
import java.io.FileNotFoundException;
import java.io.IOException;
import java.io.InputStream;
import java.nio.file.Files;
import java.nio.file.Path;
import java.nio.file.Paths;
import java.util.ArrayList;
import java.util.List;

import javax.swing.AbstractAction;
import javax.swing.ImageIcon;
import javax.swing.JButton;
import javax.swing.JFileChooser;
import javax.swing.JFrame;
import javax.swing.JMenu;
import javax.swing.JMenuBar;
import javax.swing.JMenuItem;

public class Frame extends JFrame{
	int WID = 700;
	int HEI = 1200;
	Canvas c;
	int mouseHeld = 0;
	int clickedOn = 0;
	KeyListener keyListener;
	JFileChooser fc;
	public Frame(int WID,int HEI,Canvas c) {
		this.WID = WID;
		this.HEI = HEI;
		this.c = c;
		fc = new JFileChooser();
		fc.setCurrentDirectory(new File(System.getProperty("user.dir")));
		loadMenuBar();
		loadActionBar();

		this.setFocusable(true);
	}
	public void finishWindow() {
        this.setPreferredSize(new Dimension(WID, HEI));
        
        this.pack();
        repaint();
        this.validate();
        this.setVisible(true);
        this.setDefaultCloseOperation(EXIT_ON_CLOSE);
    //    addMyKeyListener(this.keyListener);
        
	}
	void loadMenuBar() {
		JMenuBar menuBar = new JMenuBar();
		JMenu fileMenu = new JMenu("File");
		JMenuItem saveMenu = new JMenuItem(new AbstractAction("Save") {
			@Override
			public void actionPerformed(ActionEvent arg0) {
				// TODO Auto-generated method stub
				saveDialog(arg0);
			}
			
		});
		JMenuItem openMenu = new JMenuItem(new AbstractAction("Open") {
			@Override
			public void actionPerformed(ActionEvent arg0) {
				// TODO Auto-generated method stub
				openDialog(arg0);
			}
			
		});
		fileMenu.add(openMenu);
		fileMenu.add(saveMenu);
		menuBar.add(fileMenu);
        setJMenuBar(menuBar);	
        menuBar.setVisible(true);
     }
	void loadActionBar() {
		Panel panel = new Panel();

		JButton pencilB=new JButton(getIcon("Pencil")); 
		pencilB.addActionListener(new ActionListener()
		{
			  public void actionPerformed(ActionEvent e)
			  {
				  c.setBrushType("Pencil");
			  }
		});
		
		
		JButton penB=new JButton(getIcon("Pen")); 
		penB.addActionListener(new ActionListener()
		{
			  public void actionPerformed(ActionEvent e)
			  {
				  c.setBrushType("Pen");
			  }
		});

		
		
		
		panel.add(pencilB);
		panel.add(penB);

		this.add(panel,BorderLayout.SOUTH);
		panel.repaint();
	}
	ImageIcon getIcon(String icon) {
		if(icon.equals("Pencil")) {
			ImageIcon imageIcon = new ImageIcon("resources\\icons\\pencil.png"); // load the image to a imageIcon
			Image image = imageIcon.getImage(); // transform it 
			Image newimg = image.getScaledInstance(50, 50,  java.awt.Image.SCALE_SMOOTH); // scale it the smooth way  
			imageIcon = new ImageIcon(newimg);  // transform it back
			return imageIcon;
		}
		if(icon.equals("Pen")) {
			ImageIcon imageIcon = new ImageIcon("resources\\icons\\pen.png"); // load the image to a imageIcon
			Image image = imageIcon.getImage(); // transform it 
			Image newimg = image.getScaledInstance(50, 50,  java.awt.Image.SCALE_SMOOTH); // scale it the smooth way  
			imageIcon = new ImageIcon(newimg);  // transform it back
			return imageIcon;
		}

		return null;
	}
	@Override
	public void paint(Graphics g) {
		super.paint(g);
		update();

	}
	public void update() {
		if(mouseHeld == 1) {
			if(clickedOn == 1) {
				c.click();
			}
		}
	}
	public void changeBrushSize(int size) {
		c.setBrushSize(size);
	}
	public void changeBrushColor(Color color) {
		c.setBrushColor(color);
	}
	public void click(MouseEvent e) {
		mouseHeld = 1;
		int x = e.getX();
		int y = e.getY();
		if(c.containsM(x, y) == 1) {
			clickedOn = 1;
		}
		else {
			clickedOn = 0;
		}
	}
	public void unclick() {
		mouseHeld = 0;
	}
	public void addMyKeyListener(KeyListener keyListener) {
		List<Component> comps = getAllComponents(this);
		for(Component c : comps) {
			c.addKeyListener(keyListener);
		}
		c.addKeyListener(keyListener);
		this.addKeyListener(keyListener);
		this.keyListener = keyListener;
	}
	public static List<Component> getAllComponents(final Container c) {
	    Component[] comps = c.getComponents();
	    List<Component> compList = new ArrayList<Component>();
	    for (Component comp : comps) {
	        compList.add(comp);
	        if (comp instanceof Container)
	            compList.addAll(getAllComponents((Container) comp));
	    }
	    return compList;
	}
	public void saveDialog(ActionEvent e) {
		int val = fc.showSaveDialog(this);
		if(val == JFileChooser.APPROVE_OPTION) {
			File file = fc.getSelectedFile();
			String input = "";
			byte data[] = c.getPixelsAsString();
			Path path = Paths.get(file.getAbsolutePath());
			try {
				Files.write(path, data);
			} catch (IOException e1) {
				// TODO Auto-generated catch block
				e1.printStackTrace();
			}
			System.out.println("Saving to: " + file.getAbsolutePath());
		}
		return;
	}
	public void openDialog(ActionEvent e) {
		int val = fc.showOpenDialog(this);
		if(val == JFileChooser.APPROVE_OPTION) {
			File file = fc.getSelectedFile();
	        try {
				InputStream inputStream = new BufferedInputStream(new FileInputStream(file.getAbsolutePath()));
			   
				byte[] buffer = new byte[1000];
			    
			   /* while (inputStream.read(buffer) != -1) {
			    	for(int i = 0;i < buffer.length;i++) {
			    		System.out.println(buffer[i]);
			    	}
			    }*/
				byte[] output = inputStream.readAllBytes();
				c.loadPixels(output);
			    inputStream.close();
			} catch (FileNotFoundException e1) {
				// TODO Auto-generated catch block
				e1.printStackTrace();
			} catch (IOException e1) {
				// TODO Auto-generated catch block
				e1.printStackTrace();
			}
		}
	}
}
