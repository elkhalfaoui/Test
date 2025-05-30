class Mobile {
    public static String name;
    public String brand;
    public int price;

    static {
        name = "Smart phone";
        System.out.println("Class Mobile");
    }

    public Mobile(String brand, int price) {
        this.brand = brand;
        this.price = price;
    }
    public Mobile() {
        this.brand = "";
        this.price = 0;
    }

    

    public void show() {
        System.out.println("name: " + name + " | brand: " + brand + " | price: " + price);
    }
}

public class Demo {
    public static void main(String ...args) throws ClassNotFoundException {
        // Mobile mobile1 = new Mobile("samsung", 1199);

        // Mobile mobile2 = new Mobile("iphone", 1099);
        
        // mobile1.show();
        // mobile2.show();
        Class.forName("Mobile");
    }
}
