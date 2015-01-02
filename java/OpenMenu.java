import java.awt.*;
import javax.swing.*;
import java.awt.event.*;
import java.io.*;
import javax.swing.filechooser.*;
import java.awt.image.BufferedImage;
import java.io.File;

import java.io.FileInputStream;
import java.io.FileOutputStream;
import java.io.IOException;
import java.io.InputStream;
import java.io.OutputStream;
import java.util.Iterator;
import javax.imageio.IIOImage;
import javax.imageio.ImageIO;
import javax.imageio.ImageWriteParam;
import javax.imageio.ImageWriter;
import javax.imageio.stream.ImageOutputStream;

public class OpenMenu extends JFrame implements ActionListener{
JMenuBar mb;
JMenu file;
JMenuItem open;
JTextArea ta;
static File dir;
OpenMenu(){
open=new JMenuItem("Open File");
open.addActionListener(this);
		
file=new JMenu("File");
file.add(open);
		
mb=new JMenuBar();
mb.setBounds(0,0,800,20);
mb.add(file);
	    
ta=new JTextArea(800,800);
ta.setBounds(0,20,800,800);
	    
add(mb);
add(ta);
		
}
public void actionPerformed(ActionEvent e) {
if(e.getSource()==open){
openFile();
}
}
	
void openFile(){
JFileChooser fc=new JFileChooser();
fc.setMultiSelectionEnabled(true);
//if (dir==null) {
			//String sdir = fc.getDefaultDirectory();
			//if (sdir!=null)
			//	dir = new File(sdir);
	//	}
		if (dir!=null)
			fc.setCurrentDirectory(dir);

int i=fc.showOpenDialog(this);

File[] files = fc.getSelectedFiles();
		if (files.length==0) { // getSelectedFiles does not work on some JVMs
			files = new File[1];
			files[0] = fc.getSelectedFile();
		}
		
		
	//System.out.println(files[0]);

		
if(i==JFileChooser.APPROVE_OPTION){
//File f=fc.getSelectedFile();
String filepath=fc.getCurrentDirectory().getPath();
			
displayContent(filepath,files);
			
}
		
}

void displayContent(String fpath,File[] f){
try{
//System.out.println(fpath);
//System.out.println(f[0]);
//File imageFile = ;
for(int i=0;i<5;i++)
{
String imageFile=f[i].getName();
System.out.println(imageFile);
        File compressedImageFile = new File("myimage_compressed.jpg");
 
        InputStream is = new FileInputStream(imageFile);
        OutputStream os = new FileOutputStream(compressedImageFile);
 
        float quality = 1.0f;
 
        // create a BufferedImage as the result of decoding the supplied InputStream
        BufferedImage image = ImageIO.read(is);
 
        // get all image writers for JPG format
        Iterator<ImageWriter> writers = ImageIO.getImageWritersByFormatName("jpg");
 
        if (!writers.hasNext())
            throw new IllegalStateException("No writers found");
 
        ImageWriter writer = (ImageWriter) writers.next();
        ImageOutputStream ios = ImageIO.createImageOutputStream(os);
        writer.setOutput(ios);
 
        ImageWriteParam param = writer.getDefaultWriteParam();
 
        // compress to a given quality
        param.setCompressionMode(ImageWriteParam.MODE_EXPLICIT);
        param.setCompressionQuality(quality);
        // appends a complete image stream containing a single image and
        //associated stream and image metadata and thumbnails to the output
        writer.write(null, new IIOImage(image, null, null), param);
        // close all streams
        is.close();
        os.close();
        ios.close();
        writer.dispose();
		System.out.println("succsss");
}

}catch (Exception e) {e.printStackTrace();	}
}

public static void main(String[] args) {
	OpenMenu om=new OpenMenu();
	om.setSize(800,800);
	om.setLayout(null);
	om.setVisible(true);
	om.setDefaultCloseOperation(EXIT_ON_CLOSE);
}
}
