public class Test {

    static String name;
    static {
        name = "Zakaria";
    }
    public static void main(String ...args) {
        int[] src = {1, 2, 3, 4, 5, 6, 7};
        int[] dest = new int[4];
        System.arraycopy(src, 3, dest, 0, 4);
        for(int i:dest) {
            System.out.println(i);
        }

        int[] copy = java.util.Arrays.copyOfRange(src, 0, 7);
        for(int i:copy) {
            System.out.println(i);
        }

        String str = "this is a string";
        str += " plus more";
        System.out.println(str);

        StringBuffer sbuf = new StringBuffer("zaka"); // StringBuffer = initial value size + 16 char
        System.out.println(sbuf.capacity());

        StringBuilder sbui = new StringBuilder("zaka"); // StringBuffer = initial value size + 16 char
        sbui.append("ria elkhalfaoui zakaria elkhalfaoui zakaria elkhalfaoui");
        System.out.println(sbui);
        System.out.println(name);
    }
}
