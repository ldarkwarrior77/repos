


function fizzBuzz(){
  for (x=1; x <= 100; x++){
    if(( x % 3 == 0 ) && ( x % 5 != 0 ))
    {
        console.log("Fizz")
    }
    if(( x % 5 == 0 ) && ( x % 3 != 0 ))
    {
        console.log("Buzz")
    }
    if(( x % 3 == 0 ) && ( x % 5 == 0))
    {
        console.log("Fizz Buzz")
    }
    if( ( x % 3 != 0 ) && ( x % 5 != 0 ) ){
        console.log(x)
    }
  }
}

fizzBuzz();
