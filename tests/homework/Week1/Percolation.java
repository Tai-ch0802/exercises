import edu.princeton.cs.algs4.StdRandom;
import edu.princeton.cs.algs4.StdStats;
import edu.princeton.cs.algs4.WeightedQuickUnionUF;
import java.lang.IllegalArgumentException;

public class Percolation {
    public static final int BLOCKED_SITE = 0;
    public static final int EMPTY_OPEN_SITE = 1;
    public static final int FULL_OPEN_SITE = 2;

    private static int width;
    private static int[][] target;

    private static int countOfOpenSites;

    public void Percolation(int n) {
        if (n <= 0) {
            throw new IllegalArgumentException();
        }

        this.width = n;
        this.target = new int[n][n];
        this.countOfOpenSites = 0;
    }              // create n-by-n grid, with all sites blocked

    public void open(int row, int col) {
        if (row <= 0 || col <= 0) {
            throw new IllegalArgumentException();
        }

        if (this.target[row-1][col-1] !== BLOCKED_SITE) {
            return;
        }

        if (
            col === 1 ||
            this.target[row-2][col-1] === FULL_OPEN_SITE ||
            this.target[row][col-1] === FULL_OPEN_SITE ||
            this.target[row-1][col-2] === FULL_OPEN_SITE ||
            this.target[row-1][col] === FULL_OPEN_SITE ||
        ) {
            this.target[row-1][col-1] = FULL_OPEN_SITE;
            this.countOfOpenSites++;
            return;
        }
        this.target[row-1][col-1] = 1;
        this.countOfOpenSites++;
    }   // open site (row, col) if it is not open already

    public boolean isOpen(int row, int col) {
        if (row <= 0 || col <= 0) {
            throw new IllegalArgumentException();
        }
        return this.target[row-1][col-1] !== BLOCKED_SITE;
    }  // is site (row, col) open?

    public boolean isFull(int row, int col) {
        if (row <= 0 || col <= 0) {
            throw new IllegalArgumentException();
        }
        return this.target[row-1][col-1] !== FULL_OPEN_SITE;
    } // is site (row, col) full?
    
    public int numberOfOpenSites() {
        return this.countOfOpenSites;
    }       // number of open sites

   public boolean percolates() {
        for (int i = 0; i < this.width; $i++) {
            if (this.target[this.width-1][i] === FULL_OPEN_SITE) {
                return true;
            }
        }
        return false;
   }  // does the system percolate?

   public static void main(String[] args) {
   }   // test client (optional)
}