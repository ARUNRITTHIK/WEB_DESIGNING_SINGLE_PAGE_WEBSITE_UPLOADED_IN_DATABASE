import java.util.Scanner;
public class ArrayRotation{
    public static void main(String ar[]) {
        Scanner sc=new Scanner(System.in);
        int n=sc.nextInt();
        int[] ar1 =new int[n];
        
        for(int i=0;i<n;i++){
            ar1[i]=sc.nextInt();
        }
      
            int temp=ar1[0];
            for(int i=0;i<ar1.length-1;i++){
                ar1[i]=ar1[i+1];
                
            }
            ar1[ar1.length-1]=temp;
            
            
        for(int i:ar1){
                System.out.print(i+" ");
            }
    }
    
}