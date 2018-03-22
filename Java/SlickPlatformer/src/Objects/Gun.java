package Objects;

public class Gun {
	int currClip = 5;
	int fullClip = 5;
	int ammo = 30;
	
	public Gun() {
		
	}
	
	public boolean reload() {
		if(ammo - fullClip >= 0) {
			ammo -= fullClip;
			currClip = fullClip;
			return true;
			
		}
		
		return false;

	}
	public int getAmmo() {
		return ammo;
	}
	public int getCurrClip() {
		return currClip;
	}
	public void setCurrClip(int set) {
		currClip = set;
	}
}
