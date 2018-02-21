import org.lwjgl.glfw.GLFW;

public class Main implements Runnable{
    private int width = 1280;
    private int height = 720;
    private Thread thread;
    private boolean running = false;

    public void start(){
        running = false;
        thread = new Thread(this,"Game");
        thread.start();
    }
    private void init(){
        GLFW.glfwInit();
    }
    public void run() {
        init();
        while(running){
            update();
            render();
        }
    }
    private void update(){

    }
    private void render(){

    }
    public static void main(String[] args){
        new Main.start();
    }
}