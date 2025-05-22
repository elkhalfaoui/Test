class Calc {
    public int add(int ...arr) {
        int res = 0;
        for(int i : arr) {
            res += i;
        }
        return res;
    }
    public int sub(int a, int b) {
        return a - b;
    }
    public int sub(int a, int b, int c) {
        return a - b - c;
    }
    public int multiple(int a, int b) {
        return a * b;
    }
    public int division(int a, int b) {
        if(b == 0) 
            return -1;
        
        return a / b;
    }
}

class Student {
    public int id;
    public String name;

    public Student() {

    }
    public Student(int id, String name) {
        this.id = id;
        this.name = name;
    }

    public void intoString() {
        System.out.println("Student  with id(" + this.id + ") : " + this.name);
    }
}

public class Hello {
    public static void main(String ...args) {

        String str = "Zakaria";
        System.out.println(str);

        Calc calc1 = new Calc();

        System.out.println(calc1.add(17, 34, 11, 22, 87, -65));
        System.out.println(calc1.sub(17, 34, -17));
        System.out.println(calc1.multiple(17, 34));
        System.out.println(calc1.division(34, 17));
        //! when you call a method the JVM will create a Stack with the parameters and their values
        //! the instence variables and methods in the object are stored in the Heap but their refrence(clac1) is stored int the main method stack


        
        int l = 12;
        int h = l%2== 0? (l-1)/2 + 1 : l/2 + 1;
        byte[][] multiDimentionalArray = new byte[h][l%2==0? l-1 : l];

        for(int i = 0; i < h; i++) {
            for(int k = 0; k < i*2 +1; k++) {
                multiDimentionalArray[i][h-1-i+k] = 1;
            }
        }
        for(byte[] line:multiDimentionalArray) {
            for(byte row: line) {
                System.out.print(row);
            }
            System.out.println();
        }

        int rand = 0;
        while (rand != 9) {
            rand = (int) (Math.random()*5 + 5); // [5, 10[
            System.out.print(rand);
        }

        Student[] std = new Student[4];

        std[0] = new Student(1, "Zakaria");
        std[1] = new Student(2, "Zakaria");
        std[2] = new Student(3, "Zakaria");
        std[3] = new Student(4, "Zakaria");

        for(Student s : std) {
            s.intoString();
        }
    }
}