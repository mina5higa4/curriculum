// 7章チェックテスト 問1
let numbers = [2, 5, 12, 13, 15, 18, 22];
//ここに答えを実装してください。↓↓↓
function isEven( Num ) {
    if( Num%2 === 0 ) console.log( Num + 'は偶数です');
}
for( i=0; i<numbers.length; i++ ){
    isEven(numbers[i]);
}
/* test
numbers.forEach(function(element){
    isEven(element);
});
*/

// 7章チェックテスト 問2
class Car{
    constructor( Gass, Num ){
        this.Gass = Gass ;
        this.Num = Num ;
    }
    getNumGas(){
        console.log( "ガソリンは" + this.Gass + "です。" + "ナンバーは" + this.Num + "です" );
    }
}
function getRandom( min, max ) {
    return Math.floor( Math.random() * (max + 1 - min) ) + min;
}
let car_list = [];
for( i=0; i<5; i++ ){
    let Gass = getRandom(0, 100);
    let Num = getRandom(1000, 9999);
    car_list[i] = new Car( Gass, Num );
    car_list[i].getNumGas();
}

/* test
car_list[0] = new Car( 2035, 10 );
car_list[1] = new Car( 2034, 20 );
car_list[2] = new Car( 2031, 30 );
car_list[3] = new Car( 2035, 50 );
car_list[4] = new Car( 2032, 60 );
car_list[5] = new Car( 2030, 90 );
for( i=0; i<car_list.length; i++ ){
    car_list[i].getNumGas();
}
*/
