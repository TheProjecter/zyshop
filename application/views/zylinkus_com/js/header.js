window.onload=function(){
	     var oUl=document.getElementsByClassName('freeze');

		 var i=0;
		 for(i=0;i<oUl.length;i++){
			 oUl[i].onclick=function(){
				 for(i=0;i<oUl.length;i++){
				       oUl[i].className='freeze';
				 }
		            this.className='active';
	 
			 }

		 }
         
}

function getElementsByClassName(className,term){
    var parentEle=null;
    if(term.parentObj){ parentEle = typeof term.parentObj=='string'
    ? document.getElementById(term.parentObj) : term.parentObj;}
    var rt = [],coll= (parentEle==null?document:parentEle).getElementsByTagName(term.tagName||'*');
    for(var i=0;i<coll.length;i++){
        if(coll[i].className.match(new RegExp('(\\s|^)'+className+'(\\s|$)'))){
            rt[rt.length]=coll[i];
        }
    }
    return rt;
}