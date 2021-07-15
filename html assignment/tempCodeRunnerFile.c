static int solve(int a0, int a1, int a2, int b0, int b1, int b2) {
        int[] result = new int[2];
        
        var tuples = new List<Tuple<int, int>>()
        { 
            Tuple.Create(a0, b0), 
            Tuple.Create(a1, b1), 
            Tuple.Create(a2, b2) 
        };
        
        foreach(var tuple in tuples)
        {
            if (tuple.Item1 > tuple.Item2)
                result[0] += 1;
            else if (tuple.Item2 > tuple.Item1)
                result[1] += 1;
        }
        
        return result;
}