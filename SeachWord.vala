namespace ide
{
	class SeachWord : GLib.Object
	{

		private int _delta[256];
		private string _patter;
		private string _text;



		/** construct class moyer-moore
		*
		* @param   text which sought
		*
		*/
		public SeachWord(string text)
		{
			_text = text;
		}

		~SeachWord(){/*stdout.printf("\n\nmuero\n\n");*/}



		/** initialize delta with position in patter string and code ancii 
		*
		*/
		private void ini_delta()
		{
			for(int k = 0;k <=255;k++)
			{
				_delta[k]  = _patter.length;
			}
			int l=_patter.length;
			for(int k = 0;k < _patter.length;k++)
			{
				if(_delta[_patter[k]]  > k )
				{
					_delta[_patter[k]]  = _patter.length-l;
					l--;
				}
			}
		}//end of ini_delta



		/** seach word in text reference
		*
		* @param p pa is a patter word to seach
		*
		* @return if return is 0 process good else return length to string 
		*/
		public int seach(string p)
		{
			_patter = p;
			ini_delta();
			int i,j;

			i = _patter.length -1 ;
			j = _patter.length -1 ;

			while(j>=0)
			{ 
				while(_text[i] != _patter[j])
				{
					if(_delta[_text[i]]>_patter.length)
					{
						i+=_delta[_text[i]];
					}
					else
					{
						i+=_patter.length-j;
					}

					if(i>=_text.length)
					{
						return _text.length;
					}
					j = _patter.length-1;		
				}
			  	j--;
				i--;
				if(j<0)
				{
					stdout.printf("encontrado %d \n",i+1 );
					i+=_patter.length<<2-1;
					j=_patter.length-1;
				 }
			}
			return 0;
		}


	}//end of class
}
