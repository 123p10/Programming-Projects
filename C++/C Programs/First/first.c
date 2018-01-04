#include <stdio.h>  
char read;
char * line = NULL;
size_t len = 0;
char * filename = "text.txt";
int main()  
{
	
	FILE *fopen(filename,"r+");
	printf(fopen);

}   
char readLine(){
 	char = getline(&line, &len, &filename);
}