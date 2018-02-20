
public class BandBooster {
	String name;
	int boxesSold;
	public BandBooster(String bName) {
		name = bName;
		boxesSold = 0;
	}
	public String getName() {
		return name;
	}
	public void updateSales(int n) {
		boxesSold += n;
	}
	public String toString() {
		return name + ": " + boxesSold + " boxes";
	}
	
}
