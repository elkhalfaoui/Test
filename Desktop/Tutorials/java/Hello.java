class Calc {
    public int add(int a, int b) {
        return a + b;
    }
    public int sub(int a, int b) {
        return a - b;
    }
    public int multiple(int a, int b) {
        return a * b;
    }
    public int division(int a, int b) {
        if(b == 0) {
            return -1;
        }
        return a / b;
    }
}

public class Hello {
    public static void main(String ...args) {

        String str = "Zakaria";
        System.out.println(str);

        Calc calc1 = new Calc();

        System.out.println(calc1.add(17, 34));
        System.out.println(calc1.sub(17, 34));
        System.out.println(calc1.multiple(17, 34));
        System.out.println(calc1.division(17, 34));

        Integer I = 17;
        

    }
}