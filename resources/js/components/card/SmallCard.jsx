import React from 'react'

const SmallCard = (props) => {

  const changeFormat = (date) => {
    let months = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Setiembre", "Octubre", "Noviembre", "Diciembre"]
    let getMonth = date.split('-')[1];
    let getDay = date.split('-')[2]
    let month = getMonth[0] == 0 ? getMonth[1] : getMonth
    return getDay+' '+months[month]
  }

  return (
    <div className='w-96 flex flex-col justify-between bg-colorWhite rounded-[10px] font-extrabold font-sansita gap-8'>
      <div className={`w-full h-52 rounded-t-[10px] ${!props.event.image ? 'bg-colorBlack': ''} bg-cover bg-center bg-no-repeat`} style={{ backgroundImage: `url(`+props.event.image+`)` }}></div>
      <h1 className='w-full text-center text-[26px]'>{props.event.name}</h1>
      <h1 className='w-full text-center text-[26px] text-colorPink'>{props.event.date}</h1>
      <h2 className='font-bold text-center'>{props.event.address}</h2>
      <button className='tracking-[0.20em] py-4 px-[69px] font-librefranklin font-bold uppercase bg-colorGreen rounded-b-[10px] text-colorWhite text-xl '>
        Apuntate
      </button>
    </div>
  )
}
export default SmallCard
