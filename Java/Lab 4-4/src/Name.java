
public class Name {
	String f,m,l;
	public Name(String first, String middle, String last) {
		f = first;
		m = middle;
		l = last;
	}
	public String getFirst() {
		return f;
	}
	public String getMiddle() {
		return m;
	}
	public String getLast() {
		return l;
	}
	public String firstMiddleLast() {
		return f + " " + m + " " + l;
	}
	public String lastFirstMiddle() {
		return l + ", " + f +" "+ m;
	}
	public boolean equals(String otherName) {
		return firstMiddleLast().equalsIgnoreCase(otherName);
	}
	public String initials() {
		return (f.substring(0,1)).toUpperCase() + (m.substring(0,1)).toUpperCase() + (l.substring(0,1)).toUpperCase();
	}
	public int length() {
		return f.length() + m.length() + l.length();
	}
}
